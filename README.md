SmartphoneShop
==============

This project is a Smartphones e-commerce website using the **MVC** pattern.
> **Note:** SmartphoneShop is still in development.

---------------------------------------------------------------------------

##Controllers

SmartphoneShop uses 3 different controllers :  [Router](#router), [FrontController](#frontcontroller) & [BackController](#backcontroller).

###Router

This is the main controller.
Its purpose is to redirect the user to the right controller (Front or Back) and to the right method, depending on the URL's arguments.
> **For example :** index.php?**controller=Front**&**method=signin** will redirect the user to the *signinAction* method from the *FrontController*.

In case of a nonexistent controller's name and/or method's name given, Router will show a 404 error page.
By default, if no argument is given, Router will redirect the user to the FrontController's homeAction method.

###FrontController

This is the public controller, meaning every user has access to this controller.
Its purpose is to redirect users to its methods, which are basic features, such as displaying products on the home page, adding/removing products to cart, signing in, or validate an order.
See the FrontController class code to get all the features.

###BackController

Finally, this is the private controller, reserved to users who are granted Administrator role.
As its name suggests, it is meant to the backend management. This controller allows administrator users to create, read, update or delete (**CRUD**) a product from the database, and also to access every order's details on the database.
