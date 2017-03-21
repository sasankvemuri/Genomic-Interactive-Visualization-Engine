# GIVE (Genomic Interactive Visualization Engine)

GIVE (Genomic Interactive Visualization Engine) is a HTML5 library that lets you embed genomic visualization panels like you work with standard HTML elements, to build a customized genome browser to visualize data from public deposits (such as ENCODE) and/or in-house data.

GIVE uses [Web Components](https://www.webcomponents.org/), specifically [Polymer Library](https://www.polymer-project.org/) for user interface and [Scaled Vector Graphics (SVG) 1.1](https://www.w3.org/TR/SVG/) for graphics. These components are supported by all major browsers.

```html
<!-- Polyfill Web Components for browsers without native support -->
<script src="/components/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

<!-- Import GIVE component -->
<link rel="import" href="/components/bower_components/genemo-visual-components/chart-controller/chart-controller.html">

<!-- Embed the browser in your webpage -->
<chart-controller title-text="My GIVE Browser"
  group-id-list='["genes", "singleCell", "customTracks"]'></chart-controller>
```

##Table of Contents

##Installation

*Installation of GIVE is optional and not required to use any of the Web Components of GIVE. By installing GIVE components, you can serve codes and/or data sources directly from your own server.*

GIVE consists of two major parts: GIVE Web Components, the client-side codes running in browsers, implemented by HTML5; and GIVE server, including bare server codes, implemented by PHP, and data sources.

To install any part of GIVE, a web-hosting environment is needed on your server.

### Installing GIVE Web Components

Just put the whole /html folder under GIVE to your hosting environment and you are good to go. Use the path on your hosting environment for the HTML `import`s to import the components in your page.

### Installing GIVE Server



#### Installing GIVE Bare Server

#### Installing GIVE Data Sources

##Usage

###Importing GIVE Components

To use GIVE components, just use HTML `import` to import Web Components polyfill and the required Web Components.

####Without Installation

All components, including Web Component polyfill, is available on our web site for direct HTML import.
```html
<script src="https://give.genemo.org/components/bower_components/webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import" href="https://give.genemo.org/components/bower_components/genemo-visual-components/chart-controller/chart-controller.html">
```

####With Installation

Please use your own path if you already installed GIVE Web Components on your hosting environment.
```html
<script src="/components/bower_components/webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import" href="/components/bower_components/genemo-visual-components/chart-controller/chart-controller.html">
```

###Implementing A Customized Genome Browser by Embedding GIVE Components

After you have imported the components in your HTML page, you can use them in several ways. The most straightforward way is to use them as if you are using common HTML tags (like <div> or <video>):
```html
<!-- Embed the browser in your webpage -->
<chart-controller title-text="My First GIVE Browser"
  group-id-list='["genes", "singleCell", "customTracks"]'></chart-controller>
```
Or you can use `Document.createElement()` to create the element in your JavaScript code:
```JavaScript
var myChart = document.createElement('chart-controller')
myChart.titleText = "My First GIVE Browser"
myChart.groupIdList = ["genes", "singleCell", "customTracks"]
```
Or use the built-in JavaScript constructors:
```JavaScript
var myChart = new GIVE.ChartController({
  titleText: "My First GIVE Browser",
  groupIdList: ["genes", "singleCell", "customTracks"]
})
```

##Credits

GIVE is developed by Xiaoyi Cao, Alvin Zheng from Dr. Sheng Zhong's lab at University of California, San Diego.

##License

Copyright 2017 GIVe Authors

This project is licensed under the Apache License, Version 2.0 (the "License");
you may not use this project except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
