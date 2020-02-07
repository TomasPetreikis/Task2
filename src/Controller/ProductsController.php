<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\ORM\TableRegistry;

   class ProductsController extends AppController{

      public function index() {
         $products = TableRegistry::get('products');
         $query = $products->find();
         $this->set('results',$query);
      }
        //form validation should be implemented
      public function add(){
        if($this->request->is('post')){
            $name = $this->request->data('name');
            $price = $this->request->data('price');
            $description = $this->request->data('description');
            $photo = $this->request->data('photo');
            $modified = $this->request->data('modified');
            $created = $this->request->data('created');
            $products_table = TableRegistry::get('products');
            $products = $products_table->newEntity();
            $products->name = $name;
            $products->price = $price;
            $products->description = $description;
            $products->photo = $photo;
            $products->modified = $modified;
            $products->created = $created;
        
           if($products_table->save($products))
           echo "Product added.";
           $this->setAction('index');
        }
     }

      public function edit($id){
        if($this->request->is('post')){
           $name = $this->request->getData('name');
           $price = $this->request->getData('price');
           $description = $this->request->getData('description');
           $photo = $this->request->getData('photo');
           $modified = date("Y-m-d H:i:s");
           //$modified = $this->request->data('modified');
           //$created = $this->request->data('created');
           $products_table = TableRegistry::get('products');
           $products = $products_table->get($id);
           $products->name = $name;
           $products->price = $price;
           $products->description = $description;
           $products->photo = $photo;
           $products->modified = $modified;
        
           if($products_table->save($products))
                echo "Product is udpated";
                $this->setAction('index');
        } 
            else {
                $products_table = TableRegistry::get('products')->find();
                $products = $products_table->where(['id'=>$id])->first();
                $this->set('name',$products->name);
                $this->set('price',$products->price);
                $this->set('description',$products->description);
                $this->set('photo',$products->photo);
                $this->set('modified',$products->modified);
                $this->set('id',$id);
            }
     }
     public function delete($id){
        $products_table = TableRegistry::get('products');
        $products = $products_table->get($id);
        $products_table->delete($products);
        echo "Product was deleted successfully.";
        $this->setAction('index');
     }
    public function xmlOutput(){
        $products = TableRegistry::get('products');
        $query = $products->find();
        $this->set('results',$query);
    }
    public function import(){
            $products_table = TableRegistry::get('products');
            
            $url = "https://raw.githubusercontent.com/wedeploy-examples/supermarket-web-example/master/products.json"; //should get the url as an input

            $json = file_get_contents($url);
            $data = json_decode($json, false);
            foreach($data as $row)
            {
                $products = $products_table->newEntity();
                $products->name = $row->title;
                $products->price = $row->price;
                $products->description = $row->description;
                $products->photo = $row->filename;
                $products->modified = date("Y-m-d H:i:s");
                $products->created = date("Y-m-d H:i:s");
                $products_table->save($products);
            }
           echo "Products added.";
           $this->setAction('index');
     }
     public function similar($id){
        $products_table = TableRegistry::get('products');
        $query = $products_table->find();
        $products = $products_table->get($id);
        $this->set('id',(int)$id);
        $this->set('results',$query);
        $this->set('result',$products);
     }
   }
?>