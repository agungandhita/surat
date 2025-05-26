<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsip extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'arsips';
    protected $primaryKey = 'arsip_id';

    protected $fillable = [
        'jenis_surat',
        'perihal',
        'tanggal_surat',
        'asal_surat',
        'keterangan',
        'file_surat',
        'user_created',
        'user_updated',
        'user_deleted',
        'deleted'
    ];

    protected $dates = ['deleted_at', 'tanggal_surat'];
}