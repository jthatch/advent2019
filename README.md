# Advent of code 2019
php7.4 solutions to the [2019 Advent of code](https://adventofcode.com/2019) challenges by [James Thatcher](https://github.com/jthatch) 2019.   
Uses Domain-driven and factory design patterns.

## Also see 
My much improved attempts at more recent Advent of Code challenges
 - [Advent of code 2020 PHP](https://github.com/jthatch/advent-of-code-php-2020)
 - [Advent of code 2021 PHP](https://github.com/jthatch/advent-of-code-2021-php)

## Requirements
##### non-docker:
- PHP 7.4 or later, [composer](https://getcomposer.org/)   
##### docker:
- [Make](https://www.gnu.org/software/make/) and [Docker](https://www.docker.com)

## Installation (non-docker):
- `git clone git@github.com:jthatch/advent2019.git`
- `cd advent2019 && composer install`

## Usage
##### non-docker:  
- `./bin/phpunit -c phpunit.xml.dist`  
or
- `./bin/phpunit -c phpunit.xml.dist tests/Day1Test.php`  
for a single test
##### docker:
- `make build`
- `make test`  
or
- `make test day=1`  
for a single test
