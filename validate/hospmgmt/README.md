

cve=$(basename $(dirname $(pwd)));plus=$(basename $(pwd)); docker build -t witcherfuzz/$cve .. && docker kill $cve-$plus; sleep 1; docker run -id --rm --name $cve-$plus -v /p:/p -v /p/Witcher/seclab-targets/$cve/$plus/coverages:/tmp/coverages witcherfuzz/$cve && docker exec -it -w $(pwd) $cve-$plus bash -c "rm -rf WICHR;find coverages -name '*.cc.json' -delete;sudo chown www-data:wc /tmp/coverages; sudo chmod 777 /tmp/coverages" && docker exec -it -w $(pwd) -u wc $cve-$plus bash



