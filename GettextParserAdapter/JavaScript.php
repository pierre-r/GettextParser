<?php
/**
 *
 */
class GettextParserAdapter_JavaScript extends GettextParserAdapter
{
    public function __construct()
    {
        //add patterns

        //search for non-plural calls: _('Text'), _("Text"), _( 'Text' )
        $this->_patterns[] = new GettextParserPattern("~[^n]+_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*\)~Uu");
        $this->_patterns[] = new GettextParserPattern("~^_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*\)~Uu");

        //search for plural calls: n_( 'country', 'countries', 3 );
        $this->_patterns[] = new GettextParserPattern(
            "~n_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*(.*)[\s]*\)~Uu",
            true
        );

        //search for plural calls: n_( 'день', 'дня', 'дней', 3 );
        $this->_patterns[] = new GettextParserPattern(
            "~n_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*(.*)[\s]*\)~Uu",
            true
        );
    }
}