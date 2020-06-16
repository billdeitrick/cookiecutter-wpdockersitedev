# {{cookiecutter.project_name}}

This is a local wordpress development environment for {{cookiecutter.project_name}} based on [cookiecutter-wpdockersitedev](https://github.com/billdeitrick/cookiecutter-wpdockersitedev).

This makes it easy to have a reproducible development environment across machines, and enables debugger integration with VSCode. 🎉

## Links

* Your site will be available at (assuming hosts modification): [{{cookiecutter.project_name}}](http://{{cookiecutter.project_name}})
* MailHog is available at: [localhost:8025](http://localhost:8025)

## Using the Environment

The usual workflow for using this development will look something like this:

1. Ensure the Docker engine is running on your local machine.
1. Run `docker-compose up` to bring up the containerized development environment.
1. Run `.\scripts\load_db.ps1` to pull a copy of the dev database into the MySQL container.
1. Set operating system hosts file such that the hostname for the website you're working on points to 127.0.0.1.
1. Do your dev work...
1. When finished, run `.\scripts\dump_db.ps1` to save a copy of the database to source control. This way any changes you make can be pushed to source control.

## Getting Started: New Site

1. Copy the `secrets.example` directory to the `secrets` directory. Change the secrets for the database from the defaults in the new `secrets` directory.
1. Be sure your Docker engine is running. In the root project directory, run `docker-compose up` to bring up the environment. This also installs the latest version of WordPress.
1. Edit your operating system's hosts file such that the domain name for your site points to the 127.0.0.1.
1. Connect to [{{cookiecutter.project_name}}](http://{{cookiecutter.project_name}}) in your browser. You may need to clear cache, use incognito or guest session, etc.
1. Walk through the WordPress install.
1. Once you've completed the WordPress install, customize the generated `wp-config.php` using code from the `examples` directory to make environment more development friendly if you would like.
1. Consider installing the mailhogsmtp plugin from the `examples` directory so you can capture mail from WordPress locally. Note that this plugin won't be pushed to source control.

## Getting Started: Existing Site

(assumes you've already created new environment with cruft)

1. Copy `secrets.example` directory to `secrets` directory, and add root/wordpress passwords to text files contained therein.
1. Get a full dump of the wordpress installation on the site, copy to html directory.
1. Get a database dump, put in `db\db.sql`
1. Modify `wp-config.php` to be appropriate for dev environment, use contents of `examples` directory as reference.
1. Consider activating Mailhog SMTP plugin to catch any sent mail.
1. Set hosts file such that DNS now resolves to the dev site.
1. Bring up the environment: `docker-compose up`
1. Import the database to the database container: `.\scripts\load_db.ps1`
