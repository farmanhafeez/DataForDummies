var json2xml = typeof exports === "undefined" ? {} : exports; // like commonjs

(function () {
    json2xml.convert = function (o) {
        var toXml = function (v, name, ind) {
                var xml = "";
                if (v instanceof Array) {
                    for (var i = 0, n = v.length; i < n; i++)
                        xml += toXml(v[i], name, ind + "");
                } else if (typeof v == "object") {
                    var hasChild = false;
                    xml += ind + "<" + name;
                    for (var m in v) {
                        if (m.charAt(0) == "@") {
                            var key = Object.keys(v[m]);
                            var values = Object.values(v[m]);
                            console.log(key);
                            console.log(values);
                            for (var i = 0; i < key.length; i++) {
                                xml +=
                                    " " +
                                    key[i] +
                                    '="' +
                                    values[i].toString() +
                                    '"';
                            }
                        } else {
                            hasChild = true;
                        }
                    }
                    xml += hasChild ? ">\n" : "/>";
                    if (hasChild) {
                        for (var m in v) {
                            if (m == "#text") xml += makeSafe(v[m]);
                            else if (m == "#cdata")
                                xml += "<![CDATA[" + lines(v[m]) + "]]>";
                            else if (m.charAt(0) != "@")
                                xml += toXml(v[m], m, ind + "\t");
                        }
                        xml +=
                            (xml.charAt(xml.length - 1) == "\n" ? ind : "") +
                            "</" +
                            name +
                            ">\n";
                    }
                } else {
                    // added special-character transform, but this needs to be better handled [micmath]
                    xml +=
                        ind +
                        "<" +
                        name +
                        ">" +
                        makeSafe(v.toString()) +
                        "</" +
                        name +
                        ">\n";
                }
                return xml;
            },
            xml = "";

        for (var m in o) {
            xml += toXml(o[m], m, "");
        }
        xml = xml.replace(/<[0-9]{1,}>/g, "<element>");
        xml = xml.replace(/<\/+[0-9]{1,}>/g, "</element>");
        return xml;
    };

    function lines(str) {
        // normalise line endings, all in file will be unixy
        str = str.replace(/\r\n/g, "\n");

        return str;
    }

    function makeSafe(str) {
        // xml special charaters
        str = str.replace(/</g, "&lt;").replace(/&/g, "&amp;");

        return lines(str);
    }
})();
