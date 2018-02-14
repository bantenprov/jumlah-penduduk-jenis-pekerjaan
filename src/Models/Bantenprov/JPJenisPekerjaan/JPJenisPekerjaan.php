<?php

namespace Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JPJenisPekerjaan extends Model
{

    protected $table = 'jumlah_penduduk_jenis_pekerjaans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan\Regency','id','regency_id');
    }

}

