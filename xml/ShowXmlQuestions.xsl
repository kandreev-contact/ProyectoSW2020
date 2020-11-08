<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <style>
            th {
                background-color: yellowgreen;
            }
        </style>

        <html>

            <body>
                <h1>Tabla de preguntas XML</h1>
                <table border="1">
                    <thread>
                        <tr>
                            <th>Autor</th>
                            <th>Enunciado</th>
                            <th>Respuesta correcta</th>
                            <th>Respuesta incorrecta</th>
                            <th>Tema</th>
                        </tr>
                    </thread>

                    <xsl:for-each select="/assessmentItems/assessmentItem">
                        <tr>
                            <td>
                                <xsl:value-of select="@author" />
                            </td>
                            <td>
                                <xsl:value-of select="itemBody/p" />
                            </td>
                            <td>
                                <xsl:value-of select="correctResponse/response" />
                            </td>
                            <td>
                                <ul>
                                    <xsl:for-each select="incorrectResponses/response">
                                        <li>
                                            <xsl:value-of select="." />
                                        </li>
                                    </xsl:for-each>
                                </ul>
                            </td>
                            <td>
                                <xsl:value-of select="@subject" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>

        </html>
    </xsl:template>
</xsl:stylesheet>