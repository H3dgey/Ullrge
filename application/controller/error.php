<?php
class Error extends Controller
{
    public function index()
    {
    	if ($this->UserModel->is_logged_in() === true) {
    		require HEADER;
	        require APP . 'view/error/index.php';
	        require FOOTER;
    	} else {
    		require APP . 'view/_templates/external/header.php';
	        require APP . 'view/error/index.php';
	        require APP . 'view/_templates/external/footer.php';
    	}
        
    }
}
