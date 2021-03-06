# WCAG Process Matrix

This originated in me being frustrated by not seeing the title for success criteria in W3C Wiki's [Accessibility Responsibility Breakdown](https://www.w3.org/community/wai-engage/wiki/Accessibility_Responsibility_Breakdown) and then all hell broke loose because I wanted to be able to tweak things around.

## Goal of this project

These tables aim at making it easier to know what acessibility criteria appply to which role in a project. It wants to integrate accessibility into the process, each criteria being identified as relevant to each role.

1. easy creation of any type of tables
2. copy-pasting should easily make it possible to create sortable/filterable ODS tables.

### The story so far

This project originated with WCAG 2.0, based on work by WAI-engage W3C Community Group.

It was evolved to WCAG 2.1 during [a workshop that took place during Paris Web 2018](https://www.paris-web.fr/2018/ateliers/integration-de-laccessibilite-dans-les-processus.php) (in French<sup>[1](#footnote1)</sup>). **Please note that all AAA criteria which are new to WCAG 2.1 have only been tagged with “Quality control” as we ran out of time during the workshop.** Also, some points did not meet consensus and were indicated as question marks (“?”) in the [table that was produced during the workshop](sources/WIP_process-matrix-wcag21.ods).

There is work in progress in EOWG (W3C's WAI Education and Outreach Working Group), to refine the concept in a project called ARRM (Accessibility Roles and Responsibilities Mapping). This mapping will eventually be used to supersede the tables below somewhere in the future (2020).

## Download files directly

If you don't want to download, install and run the project locally, you can download directly these versions:

* WCAG 2.0
	* [WCAG2.0 HTML file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag20.html)
	* [WCAG2.0 ODS file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag20.ods)
	* [WCAG2.0 XLSX file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag20.xlsx)
* WCAG 2.1
	* [WCAG2.1 HTML file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag21.html)
	* [WCAG2.1 ODS file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag21.ods)
	* [WCAG2.1 XLSX file](https://github.com/notabene/wcag-process-matrix/blob/master/output/process-matrix-wcag21.xlsx)

**Beware:** The ODS is less useful than the XLSX. I suspect PHPSpreadsheet does a better job with Excel but this will have to do for now. I still provide the ODS because open source love etc.

## Building

If you want to create your own tables, you need to install [PHPSpreadsheet](https://phpspreadsheet.readthedocs.io/). According to documentation, this needs:


* PHP version 5.6 or newer
* PHP extension php_zip enabled
* PHP extension php_xml enabled
* PHP extension php_gd2 enabled (if not compiled in)

PHPSpreadsheet is licensed under [GNU LESSER GENERAL PUBLIC LICENSE](vendor/phpoffice/phpspreadsheet/LICENSE).

For testing etc., please refer to [README2.md](README2.md).


## Credits

* WCAG 2.0 JSON taken from Karl Groves's [WCAG as JSON](https://github.com/karlgroves/wcag-as-json)
* WCAG 2.1 JSON taken from Eric Eggert's [WCAG Quickref JSON](https://github.com/w3c/wai-wcag-quickref/blob/gh-pages/_data/wcag21.json)
* Accessibility Responsibility Breakdown taken from the [General Overview](https://www.w3.org/community/wai-engage/wiki/Accessibility_Responsibility_Breakdown#General_Overview), then transformed (from sources/overview_table.html) into a JSON.
* WCAG 2.1 responsibilities were created at a workshop during Paris Web 2018, thanks to all participants to the workshop! [Source table](sources/WIP_process-matrix-wcag21.ods)

## LICENCE

MIT license.

This software or document includes material copied from or derived from Web Content Accessibility Guidelines (WCAG) 2.0 https://www.w3.org/TR/WCAG20/ Copyright © 2008 W3C® (MIT, ERCIM, Keio, Beihang) and Web Content Accessibility Guidelines (WCAG) 2.1 https://www.w3.org/TR/WCAG21/ Copyright © 2017-2018 W3C® (MIT, ERCIM, Keio, Beihang).

## Notes

<a name="footnote1">1</a>: Sorry, Github-flavoured Markdown does not support `hreflang` at the time of writing.

