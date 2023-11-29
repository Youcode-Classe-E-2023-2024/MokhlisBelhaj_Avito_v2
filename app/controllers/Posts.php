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

    public function updPost($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'post') {
            $post = $this->postModel->getPostById($id); // Assuming you have a method to fetch post data by ID

            $data = [
                'desc' => $_POST['desc'],
                'image' => ($_FILES['image']['name']) ? $_FILES['image']['name'] : $post->image,
                'prix' => $_POST['prix'],
            ];

            if (!empty($_POST['name'])) {
                $data['name'] = $_POST['name'];
            }
            if (!empty($_POST['desc'])) {
                $data['desc'] = $_POST['desc'];
            }
            // Add validation for other fields if needed

            if (empty($data['name_err']) && empty($data['desc_err']) /* && other validations */) {
                // Check if a new file is uploaded
                if (!empty($_FILES['image']['name'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_destination = 'C:\\xampp\\htdocs\\MokhlisBelhaj_Avito_v2\\public\\img\\' . $file_name;

                    $data['image'] = $file_name;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                    } else {
                        $data['image'] =  $post->image;
                    }
                }

                // Update the post in the database
                if ($this->postModel->updatePost($data)) {
                    flash('post_updated', 'Post Updated');
                    die('test');
                    redirect('dashbaord/index');
                } else {
                    die('Error updating post');
                }
            } else {
                die('Error updating post');
            }
        } else {


            // Fetch the existing post data and display the form
            echo ("10");

            $post = $this->postModel->getPostById($id);

            $data = [
                'name' => $post->name,
                'desc' => $post->desc,
                'image' => $post->image,
                'prix' => $post->prix,
                'name_err' => '',
                'desc_err' => '',
                'image_err' => '',
                'prix_err' => '',
            ];
            redirect('dashbaord/index');
            // $this->view('posts/edit', $data);
        }
    }
    public function updatePost($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'post') {
            die('hello');

        }
        else  {
            
            
            // Fetch the existing post data and display the form
           
            $post = $this->postModel->getpostById($id);
           
          
            redirect('dashbaord/index',$post);
    }
}
}

