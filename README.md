# Pluto
The open source software development course's repository.

It lies on the same basis as [Mars](https://github.com/luksan47/mars) to prepare its development.

## Set up development environment

For OS X, [Valet](https://laravel.com/docs/8.x/valet) gives a pretty smooth experience. Easy to download, easy to configure.

For Windows and Linux we will use [Laravel Homestead](https://laravel.com/docs/homestead) for local development. With Homestead, the web server is hosted from a virtual machine with the help of VirtualBox and Vagrant.

1. If you haven't already, download and install [Git](https://git-scm.com/downloads), [GitHub Desktop](https://desktop.github.com/), [VirtualBox](https://www.virtualbox.org/), and [Vagrant](https://www.vagrantup.com/).

2. Recommended: create a new folder named "Git" for your git projects.

3. Fork (click on the fork button at top right corner of the page) and clone (~Download) your fork of the Pluto repository. You can easily do this with `Github Desktop`. If you can not find this option there, clicking on the green `Code` button on the GitHub webpage and selecting `Open with GitHub Desktop` will do the job. Or you can use the command line too to clone the directory (see point 5.). Make sure to clone the `your_username/pluto`, not the `EotvosCollegium/pluto` repository. 

4. Open a terminal and navigate to your git folder. (If you are not familiar with the command line, watch some YouTube tutorial about the terminal basics.)

5. Run `git clone https://github.com/laravel/homestead.git` to clone Homestead. This will create a folder named Homestead in your git folder. We will refer this as your "Homestead directory".

6. Navigate to your Homestead directory: `cd Homestead`.

7. Run `bash init.sh` on macOs/Linux or `init.bat` on Windows to create the `Homestead.yaml` configuration file.

8. The only essential thing to set in this file is to set the path to your project. For example:
```
folders:
    -   map: C:\Users\domi\Documents\GitHub\pluto
        to: /home/vagrant/code
```
The above line will map the folder `C:\Users\domi\Documents\GitHub\pluto` to the folder `/home/vagrant/code` in your Homestead virtal machine.

9. You will need to create ssh keys to connect to the Homestead VM. Run `ssh-keygen -t rsa -b 4096 -C "your_email@example.com"` to generate the keys (if the system can not find this command, try running it in `Git Bash` - this program should have been installed with git.) If the prompt says `Enter file in which to save the key...` just press enter to create the file in the default location, then enter a passphrase (~password, but we won't need to remember it).

10. In your Homestead directory, run `vagrant up`. This will create a virtual machine with the Homestead configuration. If no error messages appear, run `vagrant ssh` to connect to the virtual machine. You will find yourself in the `/home/vagrant` directory in the VM. Here everything is installed and set up for you, including php, mysql, composer, etc.

11. Navigate to your project folder (`cd code`). We will be working from here from now on.

12. Run `composer install` to install the laravel dependencies.

13. Run `cp .env.example .env` to copy/create the `.env` file. This is the file that contains the environment variables, therefore it is not synced with git. You can add your own passwords and other sensitive information to this file. Fill in the `DEVELOPER_NAME` and `DEVELOPER_EMAIL` variables to use your custom login credentials.

14. Run `php artisan key:generate` to generate the application key in `.env`. This is used for security purposes.

15. Run `php artisan migrate:fresh --seed`. This will create the database tables (`migrating`) and fill them with the default data (`seeding`). `fresh` indicates to drop the existing tables first, if you had some - this will be useful later.

16. Now you should be able to access the website by entering `192.168.10.10` in your browser. Log in with `admin@pluto.com` (or your custom email set in `.env`) and `asdasdasd` as password.

17. Congrats, you can start coding! You changes will be synced automatically and you can test it in the browser.

Notes:
- As you can see, Laravel's commands are look like `php artisan ~:~ --options`. Get used to it. To create a new file, it is recommended to use `php artisan make:model ModelName` for example (also: controller, migration, etc.)
- For more configuartion options (eg. use custom website names instead of `192.168.10.10`), look at the [Homestead documentation](https://laravel.com/docs/8.x/homestead#configuring-homestead).
- To shut down the Homestead VM, run `vagrant halt`.
- Most of the above setup is a one-time thing to do. However, whenever you start working, you might need to run `vagrant up` and `vagrant ssh` to start the virtual machine. If you create migrations or you want to reset the database, run `php artisan migrate:fresh --seed`.

## Beginner guide
The basic things you will need as a beginner:
- Controllers: `app/Http/Controllers` - the main functionalities of the backend
- Database: 
    - [Migrations](https://laravel.com/docs/8.x/migrations): `database/migrations` - the database structure can be modified with migrations
    - [Seeders](https://laravel.com/docs/8.x/seeding): `database/seeders`, `database/factories` - the database can be seeded with dummy data which are set in factories
    - Read the [documentation of queries](https://laravel.com/docs/8.x/queries) to understand how to insert/update/delete data in the database. Laravel also has [particular functions for inserting and updating models](https://laravel.com/docs/8.x/eloquent#inserting-and-updating-models). The queries will mostly return [Collections](https://laravel.com/docs/8.x/collections), which are similar to arrays but with custom functions. 
- [Models](https://laravel.com/docs/8.x/eloquent): `app/Models` - the database is mapped to php classes using Models (ORM - Object Relational Mapping). Models are the main way to interact with the database. To create Models, use `php artisan make:model ModelName -a` to generate the model and a corresponding controller, factory, etc. Also take a look at [Relationships](https://laravel.com/docs/8.x/eloquent-relationships) to define relations between Models.
- Routes: `routes/web` - to map the requests from the browser to controller functions
- Frontend: `resources/views` - the webpage is generated from these blade files. To return a webpage, use `return view('path.to.view', ['additional_data' => $data, ...]);`. Blade files are html codes with [additional php functionalities](https://laravel.com/docs/8.x/blade#blade-directives): loops, variables, etc. Writing `{{ something }}` is equivalent to php's print: `echo something;`. When writing forms, add `@csrf` to the form for security reasons (without it, the request will not work). Blade files can also be nested, included, etc (eg. `@include('path.to.file'))`). Our front-end framework is [Materialize](https://materializecss.github.io/materialize/).
- Language files: `resources/lang` - to translate the webpage. Use `__('filename.key')` in the backend and `@lang('filename.key')` in blades. To add variables: `__('filename.key', ['variable' => 'value'])`, prefix the variable name with `:` in the language files.
- Validation: It is recommended to validate every user input: for example, in the controller: `$request->validate(['title' => 'required|string|max:255']);`. [Available validation rules](https://laravel.com/docs/8.x/validation#available-validation-rules).
- Debugging: log files: `storage/logs/laravel.log` - use `Log::info('something happened', ['additional_data' => $data])` to log (also: error, warning, etc.). Alternatively, in the controllers, you can type `return response()->json(...);` to print some thing in the browser. In blades, type `{{ var_dump($data) }}` to display some data. It is worth to take a look at the [query debugging options](https://laravel.com/docs/8.x/queries#debugging) also.

## Official documentations
- [Laravel](https://laravel.com/docs/8.x)
- [Materialize](https://materializecss.github.io/materialize/)
