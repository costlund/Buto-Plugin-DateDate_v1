# Buto-Plugin-DateDate_v1

Date plugin.

## Usage

Create object
```
$date_v1 = new PluginDateDate_v1('2001-01-01');
```

Add one day.
```
$date_v1->add_days(1);
```
Add one day minus.
```
$date_v1->add_days(1, true);
```


Add one months.
```
$date_v1->add_months(1);
```
Add one months minus.
```
$date_v1->add_months(1, true);
```


Get date.
```
echo($date_v1->get_date_format('Y-m-d'));
```
