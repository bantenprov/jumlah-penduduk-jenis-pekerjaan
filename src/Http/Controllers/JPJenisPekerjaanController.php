<?php namespace Bantenprov\JPJenisPekerjaan\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\JPJenisPekerjaan\Facades\JPJenisPekerjaan;

/* Models */
use Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan\JPJenisPekerjaan as JPJenisPekerjaanModel;
use Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan\Province;
use Bantenprov\JPJenisPekerjaan\Models\Bantenprov\JPJenisPekerjaan\Regency;

/* etc */
use Validator;

/**
 * The JPJenisPekerjaanController class.
 *
 * @package Bantenprov\JPJenisPekerjaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisPekerjaanController extends Controller
{

    protected $province;

    protected $regency;

    protected $jumlah_penduduk_jenis_pekerjaan;

    public function __construct(Regency $regency, Province $province, JPJenisPekerjaanModel $jumlah_penduduk_jenis_pekerjaan)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->jumlah_penduduk_jenis_pekerjaan     = $jumlah_penduduk_jenis_pekerjaan;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $jumlah_penduduk_jenis_pekerjaan = $this->jumlah_penduduk_jenis_pekerjaan->find($id);

        return response()->json([
            'negara'    => $jumlah_penduduk_jenis_pekerjaan->negara,
            'province'  => $jumlah_penduduk_jenis_pekerjaan->getProvince->name,
            'regencies' => $jumlah_penduduk_jenis_pekerjaan->getRegency->name,
            'tahun'     => $jumlah_penduduk_jenis_pekerjaan->tahun,
            'data'      => $jumlah_penduduk_jenis_pekerjaan->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->jumlah_penduduk_jenis_pekerjaan->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->jumlah_penduduk_jenis_pekerjaan->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'Jumlah Penduduk '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

