# Url Shortner

Without using an external database, we'd like you to create a URL shortening service. 

There should be an endpoint that responds to POST with a json body containing a URL, which responds with a JSON repsonse of the short url and the orignal URL, as in the following curl example:

~~~
curl localhost -XPOST -d '{ "url": "http://www.payasugym.com" }'
{ "short_url": "/abc123", "url": "http://www.payasugym.com" }
~~~
When you send a GET request to a previously returned URL, it should redirect to the POSTed URL, as shown in the following curl example:

~~~
curl -v localhost/abc123
...
< HTTP/1.1 301 Moved Permanently
...
< Location: http://www.payasugym.com
...
{ "url": "http://www.payasugym.com" }
~~~
On the frontend we would like you to use React, there should be an input field and submit button on the page into which the URL you would like to shorten can be entered and the short url should be returned 

To start you off on the frontend we have created a hello world example, which you can use as the basis for the React Frontend.
To start off, clone the repository and create a new branch.

To install the node modules run:
~~~
npm install
~~~

To create the JS bundle and run the watcher run:
~~~
npm run watch
~~~

You can use whatever npm modules and PHP framework you are comfortable with. 

For extra points: Style the frontend with Sass

Please don't spend more than a few hours on this.

## Submission

Please clone this repository, write your code and update this README with a guide of how to run it.

Either send us a link to the repository on somewhere like github or bitbucket (bitbucket has free private repositories).


### API Dev

1. go to `$ cd /api` directory
2. run `$ composer install` - install dependencies
3. run `$ mv .env.dist .env`
4. run `$ php bin/console server:run *:9090` - run dev server on port `9090`


### FE Dev

1. On root directory
2. run `$ yarn` or `npm install`
3. run `$ yarn watch` or `$ npm run watch` listen port `8090`

## UPDATE
API dev environment can be run on any other port or even without
It's very important to change `path/to/project/src/config.js` constant `API_PORT`