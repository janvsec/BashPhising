#!/usr/bin/env bash
BASE_DIR="$(cd "$(dirname "$0")" && pwd)"
INBOX="$BASE_DIR/server/inbox.txt"
WEBROOT="$BASE_DIR/server/www"
#FN00991
mkdir -p "$WEBROOT"
touch "$INBOX"
php -S 127.0.0.1:8000 -t "$WEBROOT" &
PHP_PID=$!
#FN00992
echo "PHP server running at http://127.0.0.1:8000"
echo "Waiting for web input..."
last_lines=0
while true; do
    lines=$(wc -l < "$INBOX")

    if [ "$lines" -gt "$last_lines" ]; then
        # Only print non-empty lines
        tail -n $((lines - last_lines)) "$INBOX" | while read -r line; do
            if [[ -n "${line// }" ]]; then
                echo "$line"
            fi
        done
        last_lines=$lines
    fi

    sleep 1
done
kill $PHP_PID
