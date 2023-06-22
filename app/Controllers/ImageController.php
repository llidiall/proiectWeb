<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DressesModel;

class ImageController extends BaseController
{   
    public function index()
    {
        $model = new DressesModel();
        $data['dresses'] = $model->findAll();

        return view('products', $data);
    }
    
    public function upload()
    {   
        $model = new DressesModel();
        $data['dresses'] = $model->findAll();
        return view('upload',$data);
    }
    
    public function save()
    {
        $model = new DressesModel();
        $url1 = $this->do_upload();
        $url = substr($url1, 1);
        $name = $this->request->getPost('nume');
        $price = $this->request->getPost('pret');
        $color = $this->request->getPost('culoare');
        $input = $this->validate(
            [
                'nume'  => 'required|min_length[3]|max_length[30]',                
                'culoare'  => 'required|min_length[3]|max_length[20]',
                
                'pret'  => 'required|numeric',
            ]
        );
        
        if (!$input)
        {
            $data['validation'] = $this->validator;
            return view('/upload', $data);
        }
        else
        {
        $data = [
            'nume' => $name,
            'imagine' => $url,
            'pret' => $price,
            'culoare' => $color,
        ];
        
        $model->insert($data);
        
        }
        return redirect()->to(base_url('/products'));
}
    
    private function do_upload()
    {
        $type = explode('.', $_FILES["imagine"]["name"]);
        $type = strtolower(end($type)); // Get the file extension in lowercase
        $url = "./assets/img/" . uniqid(rand()) . '.' . $type;

        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {
            if (is_uploaded_file($_FILES["imagine"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["imagine"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        }

        return "";
    }
    
  
    public function edit($id = null) 
    {
        $model = new DressesModel();
        $data['image'] = $model->where('id', $id)->first();
        return view('edit_dress', $data);
    }

    public function update()
{
    helper('form', 'url');
    $model = new DressesModel();
    
    $id = $this->request->getPost('id');
    $postData = [
        'nume' => $this->request->getPost('nume'),
        'pret' => $this->request->getPost('pret'),
        'culoare' =>  $this->request->getPost('culoare'),
    ];
    
    $uploadedImage = $this->do_upload();
    if (!empty($uploadedImage)) {
        $postData['imagine'] = $uploadedImage;
    } else {
        $existingPost = $model->find($id);
        if ($existingPost) {
            $postData['imagine'] = $existingPost['imagine'];
        }
    }
    
    $model->update($id, $postData);
    return redirect()->to(base_url('/dresses'));
}

    public function delete($id = null)
    {
        $model = new DressesModel();
        $model->where('id', $id)->delete();
        return redirect()->to(base_url('/dresses'));
    }
}
