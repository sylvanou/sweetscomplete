<?php
class View
{
    public function displayProducts($page, $linesPerPage, $maxProducts, $products)
    {
        $offset = $page * $linesPerPage;
        $output = '';
        for ($i = 0; $i < $linesPerPage; $i++) {
            if ($i + $offset >= $maxProducts) {
                break;
            }
            $output .= '<li>';
            $output .= '<div class ="image">';
            $output .= '<a href="detail.php">';
            $output .= '<img src = "images/'
                . $products[$i + $offset]['link']
                . '.scale_20.JPG" alt="'
                . $products[$i + $offset]['title']
                . '" width = "190" height = "130"/>';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '<div class ="detail">';
            $output .= '<p class ="name" > <a href = "detail.php"'
                . $products[$i + $offset]['title']
                . '</a></p>';
            $output .= '<p class="view"><a href="detail.php">purchase</a> | <a href="detail.php">view details >></a></p>';
            $output .= '</div>';
            $output .= '</li>';
        }
        return $output;

    }
    public function displayMembers($page, $linesPerPage, $maxMembers, $members)
    {
        $offset = $page * $linesPerPage;
        $output = '';
        for ($i = 0; $i < $linesPerPage; $i++) {
            if ($i + $offset >= $maxMembers) {
                break;
            }
            $output .= '<tr>';
            $output .= '<td>';
            $output .= $members[$i + $offset]['user_id'];
            $output .= '</td>';
            $output .= '<td><img src="images/'
                    . 'm.gif" />'
                    . $members[$i + $offset]['name']
                    . '</td>';
            $output .= '<td>';
            $output .= $members[i + $offset]['city'];
            $output .= '</td>';
            $output .= '<td><img src="images/e.gif'
                    . '" />'.
            $output . $members[$i + $offset]['email'];
            $output .= '</td></tr>';
        }
        return $output;

    }
} 