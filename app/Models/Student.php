<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public static $student;
    public static $imageName;
    public static $drictory;
    public static $imageUrl;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$drictory = 'student-image/';
        $image->move(self::$drictory,self::$imageName);
        self::$imageUrl = self::$drictory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newStudent($request)
    {
        self::$student = new Student();
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->mobile = $request->mobile;
        self::$student->address = $request->address;
        self::$student->image = self::getImageUrl($request->file('image'));
        self::$student->save();

    }
    public static function updatestudent($request,$id)
    {
        self::$student = Student::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$student->image))
            {
                unlink(self::$student->image);
            }
            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$student->image;
        }
        self::$student->title  = $request->title;
        self::$student->author  = $request->author;
        self::$student->description  = $request->description;
        self::$student->image  = self::$imageUrl;
        self::$student->save();
    }
    public static  function deleteStudent($id)
    {
        self::$student = Student::find($id);

        if(file_exists(self::$student->image))
        {
            unlink(self::$student->image);
        }
        self::$student->delete();
    }
}
