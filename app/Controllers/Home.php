<?php

namespace App\Controllers;

use App\Models\VocabularyBookModel;

class Home extends BaseController
{
    public function index(): string
    {
        $vocabularyBook = new VocabularyBookModel();
    
        $sentences = [];
        foreach ($vocabularyBook->findAll() as $row) {
            var_dump($row->id); // entityに接続されているか(intになっているか）点検
            $sentenceArray = explode(' ', $row->sentence);
            shuffle($sentenceArray);
            $sentences[] = $sentenceArray;
        }
        $data['vocabulary_book'] = $sentences;
        
        return view('welcome_message', $data);
    }
}
