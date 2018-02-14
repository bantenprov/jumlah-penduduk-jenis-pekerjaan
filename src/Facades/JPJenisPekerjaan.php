<?php namespace Bantenprov\JPJenisPekerjaan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The JPJenisPekerjaan facade.
 *
 * @package Bantenprov\JPJenisPekerjaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisPekerjaan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jumlah-penduduk-jenis-pekerjaan';
    }
}
