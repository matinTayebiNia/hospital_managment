<?php

namespace App\Helper\Services;

use Spatie\Permission\Models\Role;

class Helper
{
    public static function getStatusValue(String $status)
    {
        switch ($status) {
            case 0:
                "Inactive";
                break;

            default:
                "Active";
                break;
        }
    }

    public static function getStatus()
    {
        return [
            '' => 'Select',
            '1' => 'Active',
            '0' => 'InActive',
        ];
    }

/*
    public static function getPerPageNumber()
    {
        return [
            \constPerPageNumber::All => \constPerPageWord::All,
            \constPerPageNumber::Five => \constPerPageWord::Five,
            \constPerPageNumber::Ten => \constPerPageWord::Ten,
            \constPerPageNumber::Fifteen => \constPerPageWord::Fifteen,
            \constPerPageNumber::TwentyFive => \constPerPageWord::TwentyFive,
            \constPerPageNumber::SeventyFive => \constPerPageWord::SeventyFive,
            \constPerPageNumber::Hundred => \constPerPageWord::Hundred,
        ];
    }*/
}
