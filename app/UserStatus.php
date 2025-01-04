<?php

namespace App;

enum UserStatus:string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case BANNED = 'banned';
    case DELETED = 'deleted';

    public function label(): string{
        return match($this){
            self::ACTIVE => 'Aktif',
            self::INACTIVE => 'TidakAktif',
            self::PENDING => 'Menunggu',
            self::BANNED => 'ban',
            self::DELETED => 'deleted',
        };
    }

}
