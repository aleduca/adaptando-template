<?php
return match ($inc) {
    'add-to-cart' => function () {
        $product = json_decode(file_get_contents("php://input"));

        $qtyTotal = isset($product->qtyTotal);

        addToCart($product->id, $product->quantity, $qtyTotal);

        echo json_encode(getCart());
    },
    'send-contact' => function () {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $subject = strip_tags($_POST['subject']);
        $message = strip_tags($_POST['message']);

        $sent = send($email, 'aleducardoso@gmail.com', $name, $subject, $message);

        if ($sent) {
            setFlash('mail', 'Email enviado com sucesso', 'color:green');
            return redirect('?inc=contact');
        }
        
        setFlash('mail', 'Ocorreu um erro ao enviar o email', 'color:red');
        return redirect('?inc=contact');
    },
    'login' => function () {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        where('email', '=', $email);
        $user = first('users');

        if (!$user) {
            setFlash('login', 'Usuário ou senha inválidos');
            return redirect('?inc=login');
        }

        if (!password_verify($password, $user->password)) {
            setFlash('login', 'Usuário ou senha inválidos');
            return redirect('?inc=login');
        }
        
        unset($user->password);
        $_SESSION['user'] = $user;
        
        return redirect('/');
    },
    default => function () {
        // var_dump('whoops, not found');
    }
};
