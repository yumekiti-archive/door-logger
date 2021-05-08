flag=true

while $flag; do

  if (docker-compose logs | grep bind-address > /dev/null 2>&1) ; then
    echo "Mysql Ready"
    flag=false
  fi

done
