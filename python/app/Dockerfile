# 公式からpython3.7 on alpine linuxイメージをpull
FROM python:3.7-alpine

# コンパイラのインストール
RUN apk add gcc build-base linux-headers

# 環境変数を設定
# Pythonがpyc filesとdiscへ書き込むことを防ぐ
ENV PYTHONDONTWRITEBYTECODE 1
# Pythonが標準入出力をバッファリングすることを防ぐ
ENV PYTHONUNBUFFERED 1

# Pipenvをインストール
RUN pip install --upgrade pip \
&& pip install pipenv

# ホストのカレントディレクトリ（現在はappディレクトリ）を作業ディレクトリにコピー
COPY . /usr/src/app/

# 作業ディレクトリを設定
WORKDIR /usr/src/app

# pipfileからパッケージをインストールしてDjango環境を構築
RUN pipenv install --skip-lock --system --dev

# サンプルデータをインポート
RUN python manage.py loaddata blog/fixture/sample.json
