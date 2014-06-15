<?php include("Bus.php");

$bus = new Bus;

echo $bus->getSpeed() . "<br>";

if (!$bus->armed) {
  echo "false" . "<br>";
};

if (!$bus->exploded) {
  echo "not exploded" . "<br>";
};

$bus->setSpeed(55);

echo $bus->getSpeed() . "<br>";

if ($bus->armed) {
  echo "armed" . "<br>";
};

$bus->setSpeed(80);

echo $bus->getSpeed() . "<br>";

if ($bus->armed) {
  echo "armed" . "<br>";
};

if (!$bus->exploded) {
  echo "not exploded" . "<br>";
};

$bus->setSpeed(30);

if ($bus->exploded) {
  echo "exploded" . "<br>";
};

$bus->exploded = false;

if (!$bus->exploded) {
  echo "not exploded" . "<br>";
};

$bus->trigger();

if ($bus->exploded) {
  echo "exploded" . "<br>";
};