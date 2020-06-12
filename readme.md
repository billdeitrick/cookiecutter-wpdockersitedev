# cookiecutter-wpdockersitedev

This is a simple environment for local WordPress development using WordPress and Docker.

This is meant to be used with [cruft](https://github.com/timothycrosley/cruft/). Using cruft, projects based on this repo can easily pull down improvements.

Generally, I've found it easiest to set my local hosts file DNS for the site I'm working on such that it resolves to the local container, and then using the actual site hostname in the dev environment. This has some downsides, such as making it easy to forget whether you're working with dev or prod (and probably others I haven't thought of), but it has worked well enough for my needs.

## Getting Started

Run the following command to get started:
`cruft create https://github.com/billdeitrick/cookiecutter-wpdockersitedev.git`

Note: cruft currently seems to have issues when running on Windows. Using it in WSL seems to work find as a workaround.