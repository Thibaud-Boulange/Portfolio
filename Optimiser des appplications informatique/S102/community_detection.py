##############
# SAE S01.01 #
##############

def liste_amis(amis, prenom):
    """
        Retourne la liste des amis de prenom en fonction du tableau amis.
    """
    prenoms_amis = []
    i = 0
    while i < len(amis)//2:
        if amis[2 * i] == prenom:
            prenoms_amis.append(amis[2*i+1])
        elif amis[2*i+1] == prenom:
            prenoms_amis.append(amis[2*i])
        i += 1
    return prenoms_amis

def nb_amis(amis, prenom):
    """ Retourne le nombre d'amis de prenom en fonction du tableau amis. """
    return len(liste_amis(amis, prenom))


def personnes_reseau(amis):
    """ Retourne un tableau contenant la liste des personnes du réseau."""
    people = []
    i = 0
    while i < len(amis):
        if amis[i] not in people:
            people.append(amis[i])
        i += 1
    return people

def taille_reseau(amis):
    """ Retourne le nombre de personnes du réseau."""
    return len(personnes_reseau(amis))

def lecture_reseau(path):
    """ Retourne le tableau d'amis en fonction des informations contenues dans le fichier path."""
    f = open(path,encoding='utf-8',mode='r')
    l = f.readlines()
    f.close()
    amis = []
    i = 0
    while i < len(l):
        fr = l[i].split(";")
        amis.append(fr[0].strip())
        amis.append(fr[1].strip())
        i += 1
    return amis

def dico_reseau(amis):
    """ Retourne le dictionnaire correspondant au réseau."""
    dico = {}
    people = personnes_reseau(amis)
    i = 0
    while i < len(people):
        dico[people[i]] = liste_amis(amis, people[i])
        i += 1
    return dico

def nb_amis_plus_pop (dico_reseau):
    """ Retourne le nombre d'amis des personnes ayant le plus d'amis."""
    personnes = list(dico_reseau)
    maxi = len(dico_reseau[personnes[0]])
    i = 1
    while i < len(personnes):
        if maxi < len(dico_reseau[personnes[i]]):
            maxi = len(dico_reseau[personnes[i]])
        i += 1
    return maxi


def les_plus_pop (dico_reseau):
    """ Retourne les personnes les plus populaires, c'est-à-dire ayant le plus d'amis."""
    max_amis = nb_amis_plus_pop(dico_reseau)
    most_pop = []
    personnes = list(dico_reseau)
    i = 1
    while i < len(personnes):
        if len(dico_reseau[personnes[i]]) == max_amis:
            most_pop.append(personnes[i])
        i += 1
    return most_pop

##############
# SAE S01.02 #
##############

def create_network(list_of_friends):
    i = 0 
    dico = {}
    while i < len(list_of_friends)/2:
        if list_of_friends[2*i] in list(dico):
            dico[list_of_friends[2*i]].append(list_of_friends[2*i+1])
        else:
            dico[list_of_friends[2*i]] = [list_of_friends[2*i+1]]
        if list_of_friends[2*i+1] in list(dico):
            dico[list_of_friends[2*i+1]].append(list_of_friends[2*i])
        else:
            dico[list_of_friends[2*i+1]] = [list_of_friends[2*i]]
        i += 1
    return dico
# Question 2
    "comparaison théorique : théoriquement nous sommes censés obtenir le même résultats avec 'dico_reseau' et 'create_network' car les deux fonctions veulent dire la même chose, seule le code est différent."
    "comparaison expérimentale : expériementalement nous remarquons qu'en executant les porgrammes des deux fonctions onobtient le même résultat si le tableau de couples d'amis est le même."

def get_people(network):
    return list(network)

def are_friends(network, person1, person2):
    return person2 in network[person1]

def all_his_friends(network, person, group):
    i=0
    while i < len(group) and are_friends(network, person, group[i]):
        i += 1
    return i == len(group)

def is_a_community(network, group):
    i=0
    while i < len(group) and all_his_friends(network, group[i], group):
        i+=1
    return i == len(group)

def find_community(network, group):
    comm = []
    i=0
    while i<len(group):
        if all_his_friends(network, group[i], comm) or comm == []:
            comm.append(group[i])
        i+=1
    return comm

def order_by_decreasing_popularity(network, group):
    i = 1
    while i < len(group):
        j = i
        while j > 0 and len(network[group[j]]) > len(network[group[j-1]]):
            tmp = group[j]
            group[j] = group[j-1]
            group[j-1] = tmp
            j -= 1
        i += 1

def find_community_by_decreasing_popularity(network):
    group = get_people(network)
    order_by_decreasing_popularity(network, group)
    return find_community(network, group)

def find_community_from_person(network, person):
    group = network[person]
    order_by_decreasing_popularity(network, group)
    comm = [person]
    i=0
    while i<len(group):
        if all_his_friends(network, group[i], comm):
            comm.append(group[i])
        i+=1
    return comm

def find_max_community(network):
    i = 0
    max = []
    ls_group = get_people(network)
    while i < len(ls_group):
        com = find_community_from_person(network, ls_group[i])
        if len(com) > len(max):
            max = com
        i +=1
    return max