<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $update = Telegram::getWebhookUpdate();
        $message = $update->getMessage();
        
        // Extract the number entered by the user
        $userInput = $message->getText();
        $chatId = $message->getChat()->getId();

        // Create image with text overlay
        $photo = $this->generateImageWithNumber($userInput);

        // Send the image back to the user
        Telegram::sendPhoto([
            'chat_id' => $chatId,
            'photo' => $photo,
        ]);
    }

    protected function generateImageWithNumber($number)
    {
        // Load default image
        $imagePath = storage_path('app/public/default_image.jpg');
        $img = Image::make($imagePath);

        // Add the number to the image
        $img->text($number, 100, 100, function ($font) {
            $font->file(storage_path('fonts/arial.ttf')); // You can change font here
            $font->size(48);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('top');
        });

        // Save the new image with the number overlay
        $newImagePath = storage_path('app/public/numbered_image.jpg');
        $img->save($newImagePath);

        return $newImagePath;
    }
}
