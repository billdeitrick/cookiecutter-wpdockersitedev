# cookiecutter-wpdockersitedev

This is a simple environment for local WordPress development using WordPress, Docker, and VSCode.

This is meant to be used with [cruft](https://github.com/timothycrosley/cruft/). Using cruft, projects based on this repo can easily pull down improvements.

Generally, I've found it easiest to set my local hosts file DNS for the site I'm working on such that it resolves to the local container, and then using the actual site hostname in the dev environment. This has some downsides, such as making it easy to forget whether you're working with dev or prod (and probably others I haven't thought of), but it has worked well enough for my needs.

As of now, this is just a setup for local dev; it's not yet optimized for deployment to production. If there's a need, this will happen. 🙂

## Getting Started

Run the following command to get started:
`cruft create https://github.com/billdeitrick/cookiecutter-wpdockersitedev.git`

Note: cruft currently seems to have issues when running on Windows. Using it in WSL seems to work fine as a workaround.

Once you've gotten a clone of the project from cruft, follow the instructions in the new repo's ReadMe to get up and running.