# php-opencensus-example

## Usage

```sh
$ docker-compose up -d
$ docker-compose run php composer install
$ curl http://localhost:8080

hello
```

## 結果をブラウザで見る

1. [http://localhost:9411](http://localhost:9411)をブラウザで開く

1. `＋`ボタンを押す

1. `serviceName=my_app`と入力してEnterを押す

1. `RUN QUERY`ボタンを押す
