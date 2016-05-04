#!/bin/bash
#
# Title:curl.sh
#
# Description:diagnostic driver
#
# Development Environment:OS X 10.9.5
#
# Author:G.S. Cole (guycole at gmail dot com)
#
#curl -v http://52.39.56.135/api_gw_lab/demo1.php/6c5790e4-80e9-4ffe-b583-d8f50caafcd3
#
#curl -v https://5g21s17vke.execute-api.us-west-2.amazonaws.com/test/demo/pathArg
#curl -v https://5g21s17vke.execute-api.us-west-2.amazonaws.com/test/demo/404
#curl -v -H "Content-Type:application/json" -d '{"key":"value"}' https://5g21s17vke.execute-api.us-west-2.amazonaws.com/test/demo/pathArg
curl -v -H "Content-Type:application/json" -d '{"key":"value"}' https://5g21s17vke.execute-api.us-west-2.amazonaws.com/test/demo/404
#
