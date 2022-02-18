# DXPR Theme

For user documentation and support please check:
https://app.sooperthemes.com/hc/documentation

For development documentation and support please check:
https://app.sooperthemes.com/hc/documentation/internal


## [WARNING] Don't push the built artifact files

Artifact (.ccs, min.js etc.) files are built and published automatically
by CI/CD (Github Actions), so don't push these
changes to the repo manually, they will be re-written anyway.

# Continuous Integration / Automation

## References

- https://www.drupal.org/docs/develop/standards
- https://www.drupal.org/node/1587138
- https://www.drupal.org/node/1955232
- https://github.com/shaundrong/eslint-config-drupal-bundle#readme

## Development Setup

You need to install `docker` and `docker-compose` to your workstation.
You can keep using whatever to run your webserver,
we just use docker to run our scripts.


### How to watch and build files

```bash
$ DEV_WATCH=true docker-compose up dev
```

### How to run eslint check

```bash
$ docker-compose up dev eslint
```

### How to run eslint check with html report

```bash
$ REPORT_ENABLED=true docker-compose up dev eslint
```

After it finishes, open `out/eslint-report.html` file to see report in details.


### How to run eslint auto fix

```bash
$ docker-compose up dev eslint-auto-fix
```

### How to run Drupal lint check

```bash
$ docker-compose up drupal-lint
```

### How to run Drupal lint auto fix

```bash
$ docker-compose up drupal-lint-auto-fix

### How to run drupal-check

```bash
$ docker-compose up drupal-check
# or
$ docker-compose run --rm drupal-check
```
```
