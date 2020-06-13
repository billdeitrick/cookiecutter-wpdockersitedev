# {{cookiecutter.project_name}}

This is a local wordpress development environment for {{cookiecutter.project_name}} based on [cookiecutter-wpdockersitedev](https://github.com/billdeitrick/cookiecutter-wpdockersitedev). 

## Getting Started: New Site

* Be sure your Docker engine is running. In the root project directory, run `docker-compose up` to bring up the environment.
* Import the database contents from version control to your database container. Run `.scripts\load_db.ps1` to do this.
* When you've made changes to the database that you want to push to version control, run `.\scripts\dump_db.ps1`.

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