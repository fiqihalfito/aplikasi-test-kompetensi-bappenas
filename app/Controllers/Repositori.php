<?php

namespace App\Controllers;

use App\Models\RepositoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Repositori extends BaseController
{
    public function index()
    {
        helper('date');

        $model = model(RepositoriModel::class);

        $data['repositories'] = $model->getRepositori();

        return view('repositori/index', $data);
    }

    public function create()
    {
        return view('repositori/create');
    }

    public function save()
    {

        $validationItem = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'repo_file' => [
                'rules' => 'uploaded[repo_file]|ext_in[repo_file,pdf,doc,docx,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'ext_in' => 'File Extention Harus Berupa word, pdf, excel',
                ]
            ]
        ];

        if (!$this->validate($validationItem)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new RepositoriModel();
        $fileRepo = $this->request->getFile('repo_file');
        $fileName = $fileRepo->getRandomName();
        $model->insert([
            'title' => $this->request->getPost('title'),
            'filename' => $fileName,
            'user_id' => session()->get('id')
        ]);
        $fileRepo->move('uploads/repositori/', $fileName);
        session()->setFlashdata('success', 'File Berhasil diupload');
        return redirect()->to('/repositori');
    }

    public function edit($id)
    {
        $model = new RepositoriModel();
        $repoData = $model->getRepositori($id);

        $data = [
            'repo' => $repoData
        ];


        return view('repositori/edit', $data);
    }

    public function update()
    {
        $validationItem = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'repo_file' => [
                'rules' => 'ext_in[repo_file,pdf,doc,docx,xls,xlsx]',
                'errors' => [
                    'ext_in' => 'File Extention Harus Berupa word, pdf, excel',
                ]
            ]
        ];

        if (!$this->validate($validationItem)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new RepositoriModel();
        $id = $this->request->getPost('id');
        $currentData = $model->getRepositori($id);

        $fileRepo = $this->request->getFile('repo_file');

        if (!$fileRepo->isValid()) {
            $model->update($id, [
                'title' => $this->request->getPost('title'),
            ]);
        } else {
            unlink('./uploads/repositori/' . $currentData['filename']);

            $fileName = $fileRepo->getRandomName();
            $model->update($id, [
                'title' => $this->request->getPost('title'),
                'filename' => $fileName,
            ]);
            $fileRepo->move('uploads/repositori/', $fileName);
        }
        session()->setFlashdata('success', 'Repositori Berhasil diubah');
        return redirect()->to('/repositori');
    }

    public function download($filename)
    {
        return $this->response->download('uploads/repositori/' . $filename, null);
    }

    public function delete($id)
    {
        helper('file');
        $model = new RepositoriModel();
        $data = $model->getRepositori($id);
        unlink('./uploads/repositori/' . $data['filename']);
        $model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/repositori');
    }
}
