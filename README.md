# api_gateway_lab
### AWS API Gateway Experiment

Demonstrate features of [AWS API Gateway](https://aws.amazon.com/api-gateway).

This repository contains a [swagger](http://swagger.io) file which creates an API Gateway that interacts w/a simple PHP example.  As a simple passthrough example, we can focus on the different stages/transformations that API Gateway performs.

## Installation

*  Deploy the PHP script [demo1.php](https://github.com/guycole/api_gateway_lab/blob/master/demo1.php)
  * Verify the PHP script is working by invoking from a browser or curl(1).
  * [curl.sh](https://github.com/guycole/api_gateway_lab/blob/master/curl.sh) is an example
  * Note that demo1.php writes `/tmp/dump.txt` which helps discover runtime state

*  Create an API Gateway using [swagger.json](https://github.com/guycole/api_gateway_lab/blob/master/swagger.json)
  * Using AWS console, navigate to Amazon API Gateway/Create new API
  * Select "Import from Swagger"
  * Push "Select Swagger File"
  * Select `swagger.json` and then 'Import'
  * If successful, you should see something like this:
 ![alt text](https://github.com/guycole/screenshot1.png "Screen Shot 1")

