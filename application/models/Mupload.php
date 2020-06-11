<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Copy Right by Muhammad Sholehuddin Al-Ayyubi, S.Kom

class Mupload extends CI_Model 
{
	function do_upload($file){
        $number_of_files = sizeof($file['tmp_name']);
        $errors = array();

        //exit(var_dump($file));

        for($i=0;$i<$number_of_files;$i++){
            if($file['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$file['name'][$i];
        }
        if(sizeof($errors)==0){
            $this->load->library('upload');
            $config['upload_path']      = './attachment/';
            //$config['allowed_types']    = 'gif|jpg|png|bmp|jpeg|xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|rtf|rtx';
            $config['allowed_types']    = 'xls|xlsx|doc|docx|ppt|pptx|pdf';
            $config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
            $config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
            $config['detect_mime'] = TRUE; //Anti SQL Injection
            $config['mod_mime_fix'] = TRUE; //Anti Triggering

            //$config['file_name'] = $file;
            $config['max_size'] = 102400; //100MB

            for($i = 0; $i < $number_of_files; $i++){
                $karakter = array(",","(",")","'");
                $lamp = str_replace($karakter, "", $file['name'][$i]);
                $lamp = date('d_m_Y_h_i_s')."-".$lamp;
                //$file = date('d_m_Y_h_i_s')."-".$lamp;
                $_FILES['attachment']['name'] = $lamp;
                $_FILES['attachment']['type'] = $file['type'][$i];
                $_FILES['attachment']['tmp_name'] = $file['tmp_name'][$i];
                $_FILES['attachment']['error'] = $file['error'][$i];
                $_FILES['attachment']['size'] = $file['size'][$i];

                $this->upload->initialize($config);

                if(!$this->upload->do_upload('attachment')){
                    //$error = array('error' => $this->upload->display_errors());
                    //return json_encode($error);
                    //return $this->upload->display_errors();
                    $data['upload_errors'][$i] = $this->upload->display_errors();
                    //exit(var_dump($error));
                } else {
                    $nama_file = $this->upload->data('file_name');
                    $attachment[] = $nama_file;

                    //Track Log
                    //$act = "Upload File ".$nama_file;

                    //$this->load->model('Mlog');
                    //$this->Mlog->create($act);

                    //Jika PDF maka lakukan konversi
                    /*if (substr($nama_file, -3) != "pdf") {
                    	$convert = $this->convert($nama_file);
                    	$this->Mlog->create($convert);
                    }*/

                    //echo exec('libreoffice --headless --convert-to pdf ./attachment/'.$nama_file.' --outdir ./pdf');
                }
            }
            $attachment = implode("#", $attachment);
            return $attachment;
        } //else return $error;
	}

    function do_single_upload($file){
        $config['upload_path']      = './attachment/';
        //$config['allowed_types']    = 'gif|jpg|png|bmp|jpeg|xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|rtf|rtx';
        $config['allowed_types']    = 'xls|xlsx|doc|docx|ppt|pptx|pdf';
        $config['file_name'] = $file;
        $config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
        $config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
        $config['detect_mime'] = TRUE; //Anti SQL Injection
        $config['mod_mime_fix'] = TRUE; //Anti Triggering
        $config['max_size'] = 102400; //100 MB

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('attachment')){
            //$error = array('error' => $this->upload->display_errors());
            return $this->upload->display_errors();
            //exit(var_dump($error));
        } else {
            //Track Log
            //$act = "Upload File ".$this->upload->data('file_name');
            //$this->load->model('Mlog');
            //$this->Mlog->create($act);

            $data = array('upload_data' => $this->upload->data());
            return $this->upload->data('file_name');
        }
    }

    /*function convert($nama_file){
        $process = exec('libreoffice --headless --convert-to pdf ./attachment/'.$nama_file.' --outdir ./pdf');
        return $process;
    }*/
}