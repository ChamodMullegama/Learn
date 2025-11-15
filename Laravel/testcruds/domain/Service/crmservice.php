<?php

namespace domain\Service;

use App\Models\crm;
use Illuminate\Support\Facades\Storage;

class crmservice
{

    protected $crm;

    public function __construct(crm $crm)
    {
        $this->crm = $crm;
    }

    public function index()
    {

        return $this->crm->select('id', 'name', 'image', 'amount')->get();
    }

    public function store(array $data)
    {

        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('crm', 'public');
        }

        return $this->crm->create($data);

    }

    public function edit($id){

         return $this->crm->find($id);

    }

    public function update(array $data , $id)
    {
        $crm = $this->crm->find($id);

        if(request()->hasFile('image')){
            if($crm->image  && Storage::exists($crm->image)){
              Storage::delete($crm->image);
            }



            
        }
    }
}
