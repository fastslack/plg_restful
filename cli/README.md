RESTFUL CLI API

The exact same functionality that is available via the web API should also be available via a CLI interface. This can be achieved in a systematic way by using the following conventions.

php RestFulCli [options] /resourcepath [fieldvaluelist]

where    options are listed below;
    resourcepath is the (possibly empty) path to the requested resource;
    fieldvaluelist is a space-separated list of field/value pairs in the format field=value.
Options
--apiversion {version}
-a {version}

The desired version of the service API to process this request.

--callback {functionName}
-c {functionName}

Response will be a JSON object wrapped in a JavaScript function called {functionName] as per [JSONP].

--checkin
-ci

Check-in the specified resource item.  This will always make a POST request so --method will be ignored.  Only available on resources which support this soft-locking mechanism.

--checkout
-co

Check-out the specified resource item.  This will always make a POST request so --method will be ignored.  Only available on resources which support this soft-locking mechanism.

--context {contextstring}
-cx {contextstring}

A value specified by the client and returned unchanged by the service.  The value MAY be used by clients to correlate responses with requests.

--fields={fieldconditions}
-f {fieldconditions}

Partial response field conditions.  The fieldconditions determine which fields are included in the response.

--file={filename}
-fi {filename}

Reads the fieldvaluelist from the named file rather than from the command line.  Useful for POST and PUT requests.

--format={format}
-fo {format}

The desired format for responses.  The default is JSON.  JSONP is also specified in this document.  Other formats, such as XML are outside the scope of this document.

--help
-h

Outputs some helpful information, such as this list of possible options.

--if-none-match {etaglist}
-inm {etaglist}

Returns the requested resource only if the resource item Etag value is not in the list of Etag values given.  Otherwise returns a 304 Not modified status.

--if-modified-since {date}
-ims {date}

Returns the requested resource only if the last modified date of the resource item is later than the date given.  Otherwise returns a 304 Not modified status.

--method={method}
-m {method}

Specifies the HTTP verb to be used to make the request.  May be any valid HTTP verb such as GET, HEAD, POST, PUT or DELETE.  Default is GET.

--page={pagenumber}
-p {pagenumber}

Specifies the page number to be returned when requesting multiple resource items.  Default is 1.

--password={password}
-pw {password}

Password for authentication purposes.

--perpage={perpage}
-pp {perpage}

Specifies the number of resource items in a page when requesting multiple resource items.  Default is 10.  Maximum is 100.

--sort={sortlist}
-s {sortlist}

Specifies the sort order to be used when requesting multiple resource items.  The sortlist is a comma-separated list of field/order pairs in the format field,order.  The order must be either asc for ascending or desc for descending.

--username={username}
-u {username}
Username for authentication purposes.

Examples
php RestFulCli /

Returns top-level metadata about the API.

php RestFulCli -q=Welcome /articles

Searches for articles containing the word “Welcome”

php RestFulCli -q=’on a clear disk you can seek forever’ /search

Searches across all resources for the phrase given.  Notice that the phrase must be protected from shell expansion by wrapping it in quotes.

php RestFulCli /articles

Returns the first 10 articles.

php RestFulCli -p 5 -pp 20 --sort=created,desc,title,asc /articles

Returns articles 101 to 120 from all articles when sorted into descending order of their created dates.  If there is more than one article with the same created date, then they those articles are listed in alphabetical order of their titles.

php RestFulCli /articles/1234

Retrieve article with id 1234.

php RestFulCli --method=PUT /articles/1234 title=’Home page’

Changes the title of article 1234 to “Home page”.

php RestFulCli --method=POST --file=/var/www/article.txt /articles

Creates a new article using field values taken from the file specified.

php RestFulCli --fields=title,alias,categories.title /articles

Returns all articles but only includes the title and alias fields from each article together with the title of the category to which it belongs.

php RestFulCli --PUT /articles/1234 state=published

Publish article 1234.


References

JCMS        Joomla CMS Development mailing list https://groups.google.com/group/joomla-dev-cms?hl=en
JEDL        Joomla Electronic Documentation License http://docs.joomla.org/JEDL
JSONP    JSON-P: Safer cross-domain Ajax with JSON-P/JSONP http://json-p.org/
REST        Architectural Styles and the Design of Network-based Software Architectures
Fielding, R., Doctoral dissertation,
University of California, Irvine, 2000. http://www.ics.uci.edu/~fielding/pubs/dissertation/top.htm
RFC2119    Key words for use in RFCs to Indicate Requirement Levels
        S. Bradner 
				http://www.ietf.org/rfc/rfc2119
RFC5234    Augmented BNF for Syntax Specifications: ABNF
        D. Crocker, P. Overell
        http://tools.ietf.org/html/rfc5234
WSWG    Web Services Working Group http://docs.joomla.org/Web_Services_Working_Group.


Author contact details

Chris Davenport
Email: chris.davenport@joomla.org

Matias Aguirre
Email: maguirre@matware.com.ar
