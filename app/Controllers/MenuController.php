<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use CodeIgniter\HTTP\Request;

class MenuController extends Controller{
    /**
     * Instance of the main request object;
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;
    function __construct()
    {
        $this-> menus = new MenuModel();
    }
    public function tampil()
    {
       #code..
        //$this-> menus = new MenuModel();
        $data['data'] = $this->menus->findAll();
        return view('menu',$data);
    }
    public function create()
    {
        #code..
        $data =array(
            'nama'=>$this->request->getPost('nama'),
            'jumlah'=>$this->request->getPost('jumlah'),
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'keterangan'=>$this->request->getPost('keterangan'),
        ) ;
        $this->menus->insert($data);
        return redirect('menu')->with('sucess','data berhasil disimpan');
    }
    public function edit($id)
    {
         #code..
         $data = array(
            'nama'=>$this->request->getPost('nama'),
            'jumlah'=>$this->request->getPost('jumlah'),
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'keterangan'=>$this->request->getPost('keterangan'),
         );
         $this->menus->update($id,$data);
         return redirect('menu')->with('sucess','data berhasil disimpan');
    }
    public function show($id)
    {
        #code..

    }
    public function delete($id)
    {
        #code..
         $this->menus->delete($id);
         return redirect('menu')->with('sucess','data berhasil dihapus ');
    }

}
?>