<?php

class ServerData
{

    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function app1()
    {
        $app1 = $this->connection->prepare("SELECT * FROM app");
        $app1->execute();
        $app1 = $app1->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($app1);

    }


    public function get_sliders()
    {

        $get_sliders = $this->connection->prepare("SELECT * FROM sliders");
        $get_sliders->execute();
        $get_sliders = $get_sliders->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($get_sliders);
    }


    // get image for pageView with id
    public function get_sliders2($data)
    {

        $product_id = array_key_exists('product_id', $data) ? $data['product_id'] : 0;
        $get_sliders2 = $this->connection->prepare("SELECT * FROM app_img WHERE product_id=? ORDER BY id ");
        $get_sliders2->execute([$product_id]);
        $get_sliders2 = $get_sliders2->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($get_sliders2);

    }

    public function getProductData($data)
    {
        $id = array_key_exists('id', $data) ? $data['id'] : 0;
        $product_data = $this->connection->prepare("SELECT * FROM product WHERE id=?");
        $product_data->execute([$id]);
        $product_data = $product_data->fetch(PDO::FETCH_ASSOC);
        echo json_encode($product_data);
    }


    public function get_comment($data)
    {

        $product_id = array_key_exists('product_id', $data) ? $data['product_id'] : 0;
        $comment = $this->connection->prepare("SELECT * FROM comment WHERE product_id=? ORDER BY id limit 13");
        $comment->execute([$product_id]);
        $comment = $comment->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($comment);

    }
