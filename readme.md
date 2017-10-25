This is an example project that simulate the authentication part of [Monica's api](https://monicahq.com), based on Oauth.

To setup the project:
* `composer install`
* Enter the client ID and the secret in the `.env` file. You can get these
values when you register a new application in your Monica's account.
* Make sure you have a valid Monica instance that runs locally.

Then, point to [http://client.app/redirect](http://client.app/redirect) to start
the Oauth process.