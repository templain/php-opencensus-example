# php-python-opencensus-example

## Abstract
flow: curl -> nginx(reverse proxy) -> PHP(FPM) -> nginx -> Django(REST API)

propagation format: GCP

distributed tracing system: OpenZipkin

## Usage

```sh
$ docker-compose up -d
$ curl http://localhost:8080/app/

AUTHORS=太郎,ひろし,花子
```

## 結果をブラウザで見る

1. [http://localhost:9411](http://localhost:9411)をブラウザで開く

1. `＋`ボタンを押す

1. `serviceName=my_app`と入力してEnterを押す

1. `RUN QUERY`ボタンを押す
