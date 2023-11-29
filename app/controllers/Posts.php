<?php
class Posts extends Controller
{
    protected $postModel;
    protected $userModel;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('user/signIn');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('userModel');
    }

    public function show($test)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $post = $this->postModel->getpostById($test);
            $idUser = $post[0]->user_id;
            $user = $this->userModel->getUserByID($idUser);
            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/show', $data);
        }
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'desc' => $_POST['desc'],
                'image' => $_FILES['image'],
                'prix' => $_POST['prix'],
                'name_err' => '',
                'desc_err' => '',
                'image_err' => '',
                'prix_err' => '',
            ];
            if (empty($_POST['name'])) {
                $data['name_err'] = 'insert name';
            }
            if (empty($_POST['desc'])) {
                $data['desc_err'] = 'insert description';
            }
            if (empty($_FILES['image'])) {
                $data['image_err'] = 'insert image';
            }
            if (empty($_POST['prix'])) {
                $data['prix_err'] = 'insert prix';
            }
            if (empty($data['name_err']) && empty($data['desc_err']) && empty($data['image_err']) && empty($data['prix_err'])) {
                // Check if a file is uploaded
                if (!empty($_FILES['image']['name'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_destination = 'C:\\xampp\\htdocs\\MokhlisBelhaj_Avito_v2\\public\\img\\' . $file_name;

                    $data['image'] = $file_name;

                    // Move the uploaded file to the destination directory
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        if ($this->postModel->addPost($data)) {
                            flash('post_added', 'Post Added');
                            redirect('dashbaord/index');
                        } else {
                            die('Error');
                        }
                    } else {
                        // Handle the case where the file upload failed
                        die('File upload failed');
                    }
                }
            } else {
                $this->view('posts/index', $data);
            }
        } else {
            $data = [
                'name' => '',
                'desc' => '',
                'image' => '',
                'prix' => '',
                'name_err' => '',
                'desc_err' => '',
                'image_err' => '',
                'prix_err' => '',
            ];
            $this->view('posts/index', $data);
        }
    }

   
    public function updatePost($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postModel->getpostById($id);
            $data = [
                'post' => $post, 
               'id'=>'',
                 'name' => $_POST['name'],
                'desc' => $_POST['desc'],
                'image' => $_FILES['image'],
                'prix' => $_POST['prix'],
            ];
            foreach ($data['post'] as $post);
            $data['id']= $post->id;
          
            if (empty($data['name'])) {
                $data['name'] = $post->name;
            }
            if (empty($data['desc'])) {
                $data['desc'] = $post->desc;
            }
            if (empty($data['prix'])) {
                $data['prix'] = $post->prix;
            }
                if (!empty($_FILES['image']['name'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_destination = 'C:\\xampp\\htdocs\\MokhlisBelhaj_Avito_v2\\public\\img\\' . $file_name;
                    $data['image'] = $file_name;
                    move_uploaded_file($file_tmp, $file_destination);
                    } else {
                        $data['image'] = $post->image;
                    }
                    if($this->postModel->updatePost($data)) {
                       redirect('dashaord');
                    }else {
                        die("Error updating");} 
        } else {
            // Fetch the existing post data and display the form
            $post = $this->postModel->getpostById($id);
            $data = [
                'post' => $post
            ];
    
            $this->view('posts/updat', $data);
        }
    }
    public function deletePost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data=$_POST['id'];
            if ($this->postModel->deletePostById($data)) {
               
                flash('post_deleted', 'Post deleted');
                redirect('dashbaord/index');
            } else {
                die('Error');
            }
    } 
    
}
}

