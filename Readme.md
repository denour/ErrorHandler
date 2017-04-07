# Error Handler

Dependencia que maneja codigos de errores con mensajes

```
    $error = new ErrorHandler(Error::class);
    $error->add(Error::INVALID_NAME);
```
Agregar al mensaje de error el atributo con error
```
    $error->add(Error::INVALID_NAME,[['name'],['Joe']])
```
Acceder al objeto y formas de imprimirlo.
```
    $error->Code;
    $error->Description;
    echo $error;
    print_r($error->toArray());
```