# [WordPress Theme - Leravio v1.2] 🎨

[![Project Status: Active.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active) [![code style: prettier](https://img.shields.io/badge/code_style-prettier-ff69b4.svg?style=flat-square)](https://github.com/prettier/prettier)

- A WordPress theme Project for Advanced WordPress Theme Development Course.
  This theme uses Bootstrap. [Learn](https://leravio.com/lessons/cara-install-wordpress-di-xampp/) to build an Advanced WordPress Theme from scratch

<a href="https://leravio.com/lessons/cara-install-wordpress-di-xampp/" target="_blank">
<img width="946" alt="Screenshot_20230210_125812" src="https://user-images.githubusercontent.com/49724190/218014482-cb9af5a3-bfe9-435a-9c40-b347fbdd29ae.png">
</a>

## Features

- Custom front page.
- Custom Blog page with posts displayed in grid format using bootstrap.
- Block Style Variations
- Custom Gutenberg Blocks
- InnerBlocks

## Maintainer

| Name                                            | Github Username |
| ----------------------------------------------- | --------------- |
| [Varrel Tantio](mailto:varreldtantio@gmail.com) | @varreltantio   |

## Usage

Clone the WordPress theme [Leravio](https://github.com/varreltantio/wordpress-leravio-theme) in your WordPress themes directory and activate it.

## Dashboard Setup.

Create pages called 'Home' and 'Blog' and set them from Appearance > Customizer > Homepage Settings

## Development ( To be added )

**Install**

Clone the repo and run

```bash
cd wordpress-leravio-theme/assets
npm install
```

**During development**

```bash
npm run dev
```

Run precommit from assets directory before pushing the code for development/contribution.

```
cd assets && npm run precommit
```

**Production**

```bash
npm run prod
```

**Linting & Formatting**

The following command will fix most errors and show and remaining ones which cannot be fixed automatically.

```bash
npm run lint:fix
```

We follow the stylelint configuration used in WordPress Gutenberg, run the following command to lint and fix styles.

```bash
npm run stylelint:fix
```

Format code with prettier ( TO BE ADDED )

```bash
npm run format-js
```

### Fixing Errors

1. Error: Node Sass does not yet support your current environment
   Solution :

```shell
cd assets
npm rebuild node-sass
```
