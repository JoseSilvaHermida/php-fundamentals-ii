Have a look at the OrderApp in the course VM.
1. Identify the namespaces used
    - OrderApp\Model
    - OrderApp\Model
    - OrderApp\Controller
    - OrderApp\Domain
    - OrderApp\Core\Traits
    - OrderApp\Core\Messaging
    - OrderApp\Core\Html
    - OrderApp\Core\Controller
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Validator
    - OrderApp\Core\Db
    - OrderApp\Core\Db
    - OrderApp\Core\Db
    - OrderApp\Core\Db
    - OrderApp\Core\View
    - OrderApp\Core\Service
    - OrderApp\Core\Service
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form\Inputs
    - OrderApp\Core\Form
    - OrderApp\Service
    - OrderApp\Form
    - OrderApp\Form
2. How is autoloading initiated?
    - Inside `public/index.php`:
    ```php
    spl_autoload_register(
        function ($class) {
            $file = str_replace('\\', '/', $class) . '.php';
            require BASE . '/src/' . $file;
        }
    );
    ```
   