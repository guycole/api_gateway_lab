# api_gateway_lab
### AWS API Gateway Experiment

Demonstrate features of [AWS API Gateway](https://aws.amazon.com/api-gateway).

This repository contains a [swagger](http://swagger.io) file which creates an API Gateway that interacts w/a simple PHP example.  As a simple passthrough example, we can focus on the different stages/transformations that API Gateway performs.

I learn by working through small examples which exercise important features but are small with minimal dependencies (easy to experiment).  In particular I learned about the interplay between swagger and amazon integration, espcially w/different HTTP status codes.  I also learned about loading a swagger model from the passthrough client, and how to discover the true client IP address (turns out to be delivered via JSON).  Hope you also find it useful.


## Installation

*  Deploy the PHP script [demo1.php] (https://github.com/guycole/api_gateway_lab/blob/master/demo1.php)
  * Verify the PHP script is working by invoking from a browser or curl(1).
  * [curl.sh](https://github.com/guycole/api_gateway_lab/blob/master/curl.sh) is an example
  * Note that [demo1.php] (https://github.com/guycole/api_gateway_lab/blob/master/demo1.php) writes `/tmp/dump.txt` to discover runtime state.

*  Create an API Gateway using [swagger.json](https://github.com/guycole/api_gateway_lab/blob/master/swagger.json)
  * Update the URI for demo1.php (within swagger.json)
  * Using AWS console, navigate to Amazon API Gateway/Create new API
  * Select "Import from Swagger"
  * Push "Select Swagger File"
  * Select `swagger.json` and then 'Import'
  * If successful, you should see something like this:
 ![alt text](https://github.com/guycole/api_gateway_lab/blob/master/images/screenshot1.png "Screen Shot 1")
  * Select "GET" and press "TEST", supply the path and query arguments when prompted.
 ![alt text](https://github.com/guycole/api_gateway_lab/blob/master/images/screenshot2.png "Screen Shot 2")
  * Scroll to see test results.  Should end w/a 200 status
  * Inspect `/tmp/dump.txt` (note that path/query arguments are converted to a JSON post)

*  Deploy API Gateway
  * From AWS console, press "Actions" button and select "Deploy API"
  * If successful, you should see something like this:
  * "Deploy API" values not critical, I picked "New Stage", "test", "test", "test" and press "Deploy"
 ![alt text](https://github.com/guycole/api_gateway_lab/blob/master/images/screenshot3.png "Screen Shot 3")

*  Test API Gateway using curl(1)
  * Cut/paste the URL supplied from deployment into [curl.sh](https://github.com/guycole/api_gateway_lab/blob/master/curl.sh) 
  * Invoke, should return a 200 status

*  Provoke a 404 status by placing 404 at the end of URL
  * i.e. `curl -v https://y2pb2sdt6d.execute-api.us-west-2.amazonaws.com/test/demo/404`
